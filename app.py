import requests

# dataget = requests.get('http://api.openweathermap.org/data/2.5/weather?appid=77763ccd48ec0f13fc6b857738eaa50c&q='+input())

cityn = input()
ci_id = -1000

import json

with open('city.list.json') as json_file:
    data = json.load(json_file)
    for dt in data:
    	if(dt['name'].lower()==cityn.lower()):
    		ci_id=dt['id']
    		break
    json_file.close()

wea={}
if(ci_id != -1000):
	try:
		dataget = requests.get('http://api.openweathermap.org/data/2.5/weather?appid=77763ccd48ec0f13fc6b857738eaa50c&id='+str(ci_id))
		dataget=dataget.json()
		w1=dataget['weather'][0]['main']
		w2=dataget['weather'][0]['description']
		w3=dataget['main']['temp']
		w4=dataget['main']['pressure']
		w5=dataget['main']['humidity']
		w6=dataget['wind']['speed']

		wea["General"]=w1
		wea["Description"]=w2
		wea["Temperature"]=w3
		wea["Pressure"]=w4
		wea["Humidity"]=w5
		wea["Speed"]=w6

	except:
		pass

print(wea)

