import requests, json, pickle, cookielib, redis, logging, urllib, config
from time import time

class Unifi:
	def __init__(self, siteId):
		self.host = 'unificl.fpt.net'
		self.username = "hieunv15@fpt.com.vn"
		self.password = "Hieu#@12345"

		self.port = "8443"
		self.version = "v5"

		self.siteId = siteId
                self.headers = {'content-type': 'application/json'}
		self.rS = redis.StrictRedis(host=config.Config['redis_host'], port=config.Config['redis_port'], db=0)
		self.cookies = self.rS.get('cookies_' + siteId)
		self.login_url = 'https://'+ self.host +':8443/api/login'
		self.guestAuth_url = 'https://'+ self.host +':8443/api/s/' + self.siteId + '/cmd/stamgr'
		self.logout_url = 'https://'+ self.host +':8443/api/logout'
		print '[Unify-Login]: ', siteId + ' ------ '+ self.cookies
		if not self.cookies:
			code, resp = self._login()	
	def _login(self):
		params = {'username': self.username, 'password': self.password}
		login_url = self.login_url
		session = requests.Session()
		req = session.post(login_url, data=json.dumps(params), headers = self.headers,  verify=False)
		if req.json()['meta']['rc'] == 'error':
			print '[Unify-LoginErr]:  ', req.json()['meta']['msg']
			return 404, req.json()['meta']['msg']
		self.cookies = json.dumps(session.cookies.get_dict())
		self.rS.set('cookies_' + self.siteId, self.cookies)	
		return 200, 'okie'
	def _logout(self):
		logout_url = self.logout_url
		params = {'username': self.username, 'password': self.password}	
		req = requests.post(logout_url,data=json.dumps(params), headers = self.headers,  verify=False, cookies=json.loads(self.cookies))
		self.rS.delete('cookies_' + self.siteId)
		return req.status_code, req.json()

	def authorize_guest(self, guest_mac, minutes, ap_mac, up_bandwidth=None, down_bandwidth=None, byte_quota=None):				
		"""
		Authorize a guest based on his MAC address.
		Arguments:
		    guest_mac     -- the guest MAC address : aa:bb:cc:dd:ee:ff
		    minutes       -- duration of the authorization in minutes
		    up_bandwith   -- up speed allowed in kbps (optional)
		    down_bandwith -- down speed allowed in kbps (optional)
		    byte_quota    -- quantity of bytes allowed in MB (optional)
		    ap_mac        -- access point MAC address (UniFi >= 3.x) (optional)
		"""
		data = {'cmd' : 'authorize-guest',
		#data = {'cmd' : 'authorize',
        		'mac' : guest_mac,
			'minutes':minutes,
        		'ap_mac': ap_mac,
			'up': up_bandwidth,
			'down': down_bandwidth,
			'bytes':byte_quota }
		auPayload = 'json='+json.dumps(data)
		req = requests.post(self.guestAuth_url, data=auPayload, headers = self.headers,  verify=False, cookies=json.loads(self.cookies))
		if req.json()['meta']['rc'] == 'error':
			print '[Unify-AuthorErr]:  ', req.json()['meta']['msg']
			if req.json()['meta']['msg'] == 'api.err.LoginRequired':
				self._login()
				req = requests.post(self.guestAuth_url, data=auPayload, headers = self.headers,  verify=False, cookies=json.loads(self.cookies))
				print "[Unify-TryAuthoGuest-] :" , req.status_code , req.json()
				return req.status_code, req.json()
		print "[Unify-AuthoGuest] :" , req.status_code , req.json() 
		return req.status_code, req.json()

