import mysql.connector
def log(StaMac, StaIP, Ssid, WlanMac, WLANID, ZoneID, PortalID, InterfaceVersion, UserLogin, PhoneNumber, Code, Msg):
        # 'insert into captiveportal_log (`StaMac`,`StaIP`,`Ssid`, `WlanMac`, `WLANID`, `ZoneID`, `PortalID`, `InterfaceVersion`, `UserLogin`, `PhoneNumber`, `Code`, `Msg`) values (\"'..StaMac..'\",\"'..StaIP..'\",\''..Ssid..'\', \"'..WlanMac..'\",\"'..WLANID..'\",\"'..ZoneID..'\",\"'..PortalID..'\",\"'..InterfaceVersion..'\",\"'..UserLogin..'\",\"'..PhoneNumber..'\",\"'..code..'\",\"'..msg..'\")'
        cnx = mysql.connector.connect(user='wifiuser', password='p@$$wifi!@#',
                              host='118.69.135.232',
                              database='wifiportal')

        insert_cm = 'insert into captiveportal_log (StaMac,StaIP,Ssid,WlanMac,WLANID,ZoneID,PortalID,InterfaceVersion,UserLogin,PhoneNumber,Code,Msg) values (\"' + StaMac + '\",\"' + StaIP + '\",\"' + Ssid + '\",\"' + WlanMac + '\",\"' + WLANID + '\",\"' + ZoneID + '\",\"' + PortalID + '\",\"' + InterfaceVersion + '\",\"' + UserLogin + '\",\"' + PhoneNumber + '\",\"' + Code + '\",\"' + Msg + '\")'
        try:
           cursor = cnx.cursor(buffered=True)
           cursor.execute(insert_cm)
	   cnx.commit()
           #result = cursor.fetchall()
           #for row in result:
	   	#print row
	except mysql.connector.Error as err:
	   print("Something went wrong: {}".format(err))
        finally:
           cnx.close()


#log("asdasd","asdasd","asdasd","asdasd","asdasd","asdasd","asdasd","asdasd","asdasd","asdasd","200","asdasd")
import redis, json
from controller import Controller
import pickle



controler = Controller("unifi.fpt.net","hieunv15@fpt.com.vn","Hieu#@12345","8443","v5")
my_pickled_mary = pickle.dumps(controler)
print (my_pickled_mary)
