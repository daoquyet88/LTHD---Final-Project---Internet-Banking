# -*- coding: utf8 -*-
import smtplib
from email.MIMEMultipart import MIMEMultipart
from email.MIMEText import MIMEText
import sys, getopt
import mysql.connector
from mysql.connector import errorcode
import sys  
import redis
import random
import string
reload(sys)  
sys.setdefaultencoding('utf8')
def randomString(stringLength=8):
    letters = string.ascii_lowercase
    return ''.join(random.choice(letters) for i in range(stringLength))
def sendEmail(to_email, subject_title, msg_body):
	
	msg = MIMEMultipart()
	msg['From'] = 'Fcall@fpt.com.vn'
	msg['To'] = to_email
	msg['Subject'] = subject_title
	msg['Content-Type'] = "text/html; charset=utf-8"
	message = msg_body
	msg.attach(MIMEText(message, 'html','UTF-8'))
	mailserver = smtplib.SMTP('mail.fpt.com.vn',587)
	mailserver.ehlo()
	mailserver.starttls()
	mailserver.ehlo()
	mailserver.login(msg['From'], 'Abcd@123456')
	mailserver.sendmail(msg['From'],msg['To'],msg.as_string())
	mailserver.quit()
	
	return 0

def main(argv):
   to_email = ''
   sub_title = ''
   msg_body = ''
  
   try:
      opts, args=getopt.getopt(argv,"ht:",["tfile=",])
   except getopt.GetoptError:
      sys.exit(2)
   for opt, arg in opts:
      if opt == '-h':
         sys.exit()
      elif opt in ("-t", "--tfile"):
        to_email = arg
   sub_title = 'Token VLQbanks'
   r = redis.Redis(host='localhost', port=6379, db=0)
   key_token = randomString(6)
   r.set(to_email, key_token, 120)
   msg_body= u'Dear Mr/Ms: Your token is' + key_token
   sendEmail(to_email, sub_title, msg_body)

def sendAPI(to_email):
   sub_title = ''
   msg_body = ''
   sub_title = 'Token VLQbanks'
   r = redis.Redis(host='localhost', port=6379, db=0)
   key_token = randomString(6)
   r.set(to_email, key_token, 120)
   msg_body= u'Dear Mr/Ms: Your token is: ' + key_token
   sendEmail(to_email, sub_title, msg_body)


if __name__ == "__main__":
   main(sys.argv[1:])

