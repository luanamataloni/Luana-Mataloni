import paramiko
import os
from scp import SCPClient


server = os.environ.get('WEB-SERVER')
port = 22
user = os.environ.get('VD-USER')
pw = os.environ.get('VD-PW')
rutaRemota = "/var/www/html/luanamataloni/"

# print("user:" + str(user))
# print("pw:" + str(pw))


def createSSHClient(server, port, user, password):
    print("ESTABLECIENDO CONEXION SSH")
    client = paramiko.SSHClient()
    client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    client.connect(server, port, user, password)
    return client

ssh=createSSHClient(server,port,user,pw)
scp=SCPClient(ssh.get_transport())

arrArchivos = os.listdir()
# print("ARCHIVOS:" + str(arrArchivos))

for archiLoop in arrArchivos:
    print(archiLoop)
    if not archiLoop.startswith("."):
        scp.put(str(archiLoop), rutaRemota + str(archiLoop))


scp.close()
