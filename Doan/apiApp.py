#!flask/bin/python
from flask import Flask, jsonify, request, abort
import httplib, urllib, ssl, redis, time, json, threading, requests, os
import mysql.connector
from random import randint
import socket
import send_email
app = Flask(__name__)
import config
import hashlib
import gnupg
from pprint import pprint
gpg = gnupg.GPG(homedir='/home/vudn/wifi-api')

key_data = open('mykeyfile.asc').read()
import_result = gpg.import_keys(key_data)
mysql_host = config.Config['mysql_host']
mysql_user = config.Config['mysql_user']
mysql_pass = config.Config['mysql_pass']


nokia_host = config.Config['nokia_host']
nokia_req_url = config.Config['nokia_req_url']
nokia_access_pass = config.Config['nokia_access_pass']

unify_host = config.Config['unify_host']

redis_host = config.Config['redis_host']
redis_port = config.Config['redis_port']
redis_pass = config.Config['redis_pass']

script_vendor_path = os.getcwd()
headers = {
    'User-Agent': 'publicAPI',
    'Content-Type': 'application/json',
}


@app.route('/send-email', methods=['POST'])
def sendEmail():
	print "[Unify-Action]: unify-login"
	if not request.json or not 'to_email' in request.json :
		print "[Unify-ErrInput]: " ,request.json
        	abort(400)
	
        send_email.sendAPI(request.json['to_email'])
	return "ok"	
@app.route('/authorize', methods=['POST'])
def authorize():
        print "[Unify-Action]: unify-login"
        if not request.json or not 'email' in request.json or not 'Authorize' in request.json:
                print "[Unify-ErrInput]: " ,request.json
                abort(400)
	r = redis.Redis(host='localhost', port=6379, db=0)
        if (request.json['Authorize']) == r.get(request.json['email']): 
		return "1" 
	else :
		return "0" 
	

	
if __name__ == '__main__':
    #app.run(debug=True)
    app.run(host='0.0.0.0')
