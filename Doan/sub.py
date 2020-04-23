#!flask/bin/python
from urllib2 import Request, urlopen, URLError
import redis, time, json


redis_host = 'localhost'
redis_port = 6379

def post_url(url, json_data)
	import requests
	r = requests.post(url, json=json_data)
	return 	
	
	
	
def get_url(url):
        request = Request(url.replace("\n", ""))
        try:
                response = urlopen(request)
                return 200, response.read()
        except URLError, e:
                print 'No kittez. Got an error code:', e
                return e, 'False'


r = redis.StrictRedis(host=redis_host, port=redis_port, db=0)
pubsub = r.pubsub()
pubsub.psubscribe("*")
for msg in pubsub.listen():
	print time.time(), msg
#        if msg['channel'] == '__keyevent@0__:lpush':
#                if msg['data'][:5] == 'MISS_':
                        #redis_conn = redis.Redis(host=redis_host,port=redis_port,password='')
                        #values = redis_conn.lrange(msg['data'],0, -1)
                        #for value in values:
                        #        _number,_time,_email = value.split('_')
                        #        if _email = 'tuanpn4@fpt.com.vn':
#                                print time.strftime('%H:%M on %x')
#                                break

