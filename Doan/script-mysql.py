import mysql.connector
import datetime
cnx = mysql.connector.connect(user='root', password='P@&&vv0rd', host='118.68.13.46', database='wifiportal', port = "6033")



insert_cm = "truncate rp_vendor"
try:
 cursor = cnx.cursor(buffered=True)
 cursor.execute(insert_cm)
 cnx.commit()
 cursor.close()
 print ("truncate vendor done!  %(n)s" % {'n':datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')})
except mysql.connector.Error as err:
 print("Something went wrong: {}".format(err)) 

insert_cm = "truncate rp_network_provider"
try:
 cursor = cnx.cursor(buffered=True)
 cursor.execute(insert_cm)
 cnx.commit()
 cursor.close()
 print ("truncate rp_network_provider done!  %(n)s" % {'n':datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')})
except mysql.connector.Error as err:
 print("Something went wrong: {}".format(err))



insert_cm = "insert into rp_vendor (vendor, total) select tmp.vendor,count(tmp.vendor) as total from captiveportal_log tmp where tmp.vendor IN(select vendor from captiveportal_log where vendor != '' group by vendor) group by tmp.vendor"
try:
 cursor = cnx.cursor(buffered=True)
 cursor.execute(insert_cm)
 cnx.commit()
 cursor.close()
 print ("ok 1 %(n)s" % {'n':datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')})
except mysql.connector.Error as err:
 print("Something went wrong: {}".format(err))
 print(datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S'))





insert_cm = "insert into rp_network_provider (network_provider_name, total) select tmp.NetworkProvider,count(tmp.NetworkProvider) as total from captiveportal_log tmp where tmp.NetworkProvider IN(select NetworkProvider from captiveportal_log where NetworkProvider != '' group by NetworkProvider) group by tmp.NetworkProvider"
try:
 cursor = cnx.cursor(buffered=True)
 cursor.execute(insert_cm)
 cnx.commit()
 cursor.close()
 print ("ok 2 %(n)s" % {'n':datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')})
except mysql.connector.Error as err:
 print("Something went wrong: {}".format(err))
 print(datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S'))
finally:
 cnx.close()



