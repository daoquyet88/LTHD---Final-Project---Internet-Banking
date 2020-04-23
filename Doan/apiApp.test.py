#!flask/bin/python
from flask import Flask, jsonify, request, abort
import httplib, urllib, ssl, redis, time, json, threading
import mysql.connector
from random import randint
import socket
app = Flask(__name__)
import config


mysql_host = config.Config['mysql_host']
mysql_user = config.Config['mysql_user']
mysql_pass = config.Config['mysql_pass']


nokia_host = config.Config['nokia_host']
nokia_req_url = config.Config['nokia_req_url']
nokia_access_pass = config.Config['nokia_access_pass'] 
headers = {
    'User-Agent': 'publicAPI',
    'Content-Type': 'application/json',
}


def Nokialog(StaMac, StaIP, Ssid, WlanMac, WLANID, ZoneID, PortalID, InterfaceVersion, UserLogin, PhoneNumber, Code, Msg, Vendor, RedirectUrl, NetworkProvider):
        cnx = mysql.connector.connect(user=mysql_user, password=mysql_pass,
                              host=mysql_host,
                              database='wifiportal')
	print StaMac, StaIP, Ssid, WlanMac, WLANID, ZoneID, PortalID, InterfaceVersion, UserLogin, PhoneNumber, Code, Msg, Vendor, RedirectUrl, NetworkProvider
	insert_cm = 'insert into captiveportal_log (StaMac,StaIP,Ssid,WlanMac,WLANID,ZoneID,PortalID,InterfaceVersion,UserLogin,PhoneNumber,Code,Msg,Vendor, RedirectUrl, NetworkProvider) values (\"' + StaMac + '\",\"' + StaIP + '\",\"' + Ssid + '\",\"' + WlanMac + '\",\"' + WLANID + '\",\"' + ZoneID + '\",\"' + PortalID + '\",\"' + InterfaceVersion + '\",\"' + UserLogin + '\",\"' + PhoneNumber + '\",\"' + str(Code) + '\",\"' + str(Msg) + '\",\"'+Vendor + '\",\"' + RedirectUrl +'\",\"' + NetworkProvider +'\")'
	try:
           cursor = cnx.cursor(buffered=True)
           cursor.execute(insert_cm)
           cnx.commit()
        except mysql.connector.Error as err:
           print("Something went wrong: {}".format(err))
        finally:
           cnx.close()

def Unify(StaMac, Ssid, WlanMac, Ts, PhoneNumber, Name, Genital, Code, Msg):
        cnx = mysql.connector.connect(user=mysql_user, password=mysql_pass,
                              host=mysql_host,
                              database='wifiportal')

        insert_cm = 'insert into captiveportal_log (StaMac, Ssid, WlanMac, Ts, PhoneNumber, Name, Genital, Code,Msg) values (\"' + StaMac + '\",\"' + Ssid + '\",\"' + WlanMac + '\",\"' + Ts + '\",\"' + PhoneNumber + '\",\"' + Name + '\",\"' + Genital + '\",\"' + Code + '\",\"' + Msg + '\")'
        try:
           cursor = cnx.cursor(buffered=True)
           cursor.execute(insert_cm)
           cnx.commit()
        except mysql.connector.Error as err:
           print("Something went wrong: {}".format(err))
        finally:
           cnx.close()

def nokiaLoginAsync(data):
	print "waiting 10s to exec nokia"
	#time.sleep(5)	
	values = json.dumps(data)
        try:
        	conn = httplib.HTTPSConnection(nokia_host, timeout=10 ,context = ssl._create_unverified_context())
                conn.request("POST", nokia_req_url, values, headers)
                response = conn.getresponse()
        except (httplib.HTTPException, socket.error) as ex:
                code = 408
                text = str(ex)
                Nokialog(data['STA MAC'],data['STA IP'], data['SSID'], data['WLAN MAC'], data['WLAN Id'], data['Zone Id'], data['Portal ID'], data['Interface Version'], data['Username'], "01688101560",code,text,data['Vendor'], data['RedirectUrl'], data['NetworkProvider'])
		return text , code
        resp = response.read()
	data_res = json.loads(resp)
	Nokialog(data['STA MAC'],data['STA IP'], data['SSID'], data['WLAN MAC'], data['WLAN Id'], data['Zone Id'], data['Portal ID'], data['Interface Version'], data['Username'], "01688101560",data_res['ResponseCode'],data_res['ResponseText'],data['Vendor'], data['RedirectUrl'], data['NetworkProvider'])
	print 'end exec nokia'
	

'''def unifyLogin(data):
	print "waiting 10s to unify"
	from controller import Controller
	host = "unifi.fpt.net"
        username = "hieunv15@fpt.com.vn"
        password = "Hieu#@12345"
	
        port = "8443"
        version = "v4"
        controler = Controller(host, username, password, port, version)
	resp = controler.authorize_guest(data['STA MAC'], data['ts'])
	print 'end exec unify'
	return resp
'''	
# thread module
class _async (threading.Thread):
    def __init__(self, threadID, name, data):
        threading.Thread.__init__(self)
        self.threadID = threadID
        self.name = name
        self.data = data
    def run(self):
	if self.name == 'nokia':
		nokiaLoginAsync(self.data)
'''	if self.name == 'unify':
		unifyLogin(self.data)
'''
@app.route('/nokia-login', methods=['POST'])
def login():
	print "nokia-login"
    	if not request.json or not 'Access Password' in request.json:
		print request.json
        	abort(400)

	redis_conn = redis.Redis(host="localhost",port=6379,password='')	
	key = redis_conn.get(request.json['STA MAC'].upper())
	if key == None:
		key = redis_conn.set(request.json['STA MAC'].upper(), request.json['STA MAC'].upper(),10)
	else:
		abort(401)	
	vendorStr = redis_conn.get("mac_to_vendor_lists")
	
	if vendorStr:
		vendorsDic = json.loads(vendorStr)
		client_mac = request.json['STA MAC'].upper()
		mac = client_mac.replace(":","")
		mac = mac[:6]
		print mac
		vendorsDic = json.loads(vendorStr)
		if vendorsDic.get(mac) == None:
			vendor = "Other"	
		else:
			vendor = vendorsDic.get(mac)
		print vendor
		req = {'Access Password' : nokia_access_pass,
        	'Interface Version' : request.json['Interface Version'],
        	'Command' : request.json['Command'],
        	'Portal ID' : request.json['Portal ID'],
        	'STA IP' : request.json['STA IP'],
        	'STA MAC' : request.json['STA MAC'],
        	'WLAN MAC' : request.json['WLAN MAC'],
        	'SSID' : request.json['SSID'],
        	'Username' : request.json['Username'],
       		'Password' : request.json['Password'],
   	     	'Zone Id' : request.json['Zone Id'],
        	'WLAN Id' : request.json['WLAN Id'],
                'RedirectUrl' : request.json['RedirectUrl'],
                'NetworkProvider' : request.json['NetworkProvider'],
                'Vendor' : vendor,	        
		}
#		if mac in vendorsDic and vendorsDic[mac] == "Apple":
		#print "Apple connect"
		values = json.dumps(req)
		try: 
			conn = httplib.HTTPSConnection(nokia_host, timeout=10 ,context = ssl._create_unverified_context())
			conn.request("POST", nokia_req_url, values, headers)
			response = conn.getresponse()
		except (httplib.HTTPException, socket.error) as ex:
			code = 408
			Text = str(ex)
			Nokialog(req['STA MAC'],req['STA IP'], req['SSID'], req['WLAN MAC'], req['WLAN Id'], req['Zone Id'], req['Portal ID'], req['Interface Version'], req['Username'], "01688101560",code,Text,req['Vendor'], req['RedirectUrl'] , req['NetworkProvider'])
			return Text , code
		data = response.read()
		data_res = json.loads(data)
		Nokialog(req['STA MAC'],req['STA IP'], req['SSID'], req['WLAN MAC'], req['WLAN Id'], req['Zone Id'], req['Portal ID'], req['Interface Version'], req['Username'], "01688101560",data_res['ResponseCode'],data_res['ResponseText'],req['Vendor'], req['RedirectUrl'] , req['NetworkProvider'])
		return data, 200
'''
	print "async connect"	
	async = _async(randint(0, 999999999), "nokia" , req)
        async.start()
	data_resp = {}
	data_resp['ResponseCode'] = 50
	data_resp['ResponseText'] = 'async'
    	return json.dumps(data_resp), 200
'''

'''@app.route('/unify-login', methods=['POST'])
def unifyLogin():
        print "unify-login"
	
	if not request.json or not 'STA MAC' in request.json or not 'ts' in request.json:
                print request.json
                abort(400)

	redis_conn = redis.Redis(host="localhost",port=6379,password='')
        vendorStr = redis_conn.get("mac_to_vendor_lists")
	req = {'ts' : request.json['ts'],
        'STA MAC' : request.json['STA MAC'],
	'SSID' : request.json['SSID'],
	'WLAN MAC' : request.json['WLAN MAC'],
	'PhoneNumber' : request.json['PhoneNumber'],
	'Name' : request.json['Name'],
	'Genital' : request.json['Genital'],
        }


        if vendorStr:
                vendorsDic = json.loads(vendorStr)

		client_mac = request.json['STA MAC'].upper()
                mac = client_mac.replace(":","")
                mac = mac[:6]
                vendorsDic = json.loads(vendorStr)
                if mac in vendorsDic and vendorsDic[mac] == "Apple":
			from controller import Controller
			unifyLogin(req)
			data_resp = {}
			data_resp['ResponseCode'] = 50
			data_resp['ResponseText'] = 'okie'
			return json.dumps(data_resp), 200


	client_mac = request.json['STA MAC'],
	ts = request.json['ts'],

	async = _async(randint(0, 999999999), "unify" , req)
        async.start()
        return json.dumps(data_resp), 200
        '''
	
if __name__ == '__main__':
    #app.run(debug=True)
    app.run(host='0.0.0.0')
