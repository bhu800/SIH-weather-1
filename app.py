import requests

dataget = requests.get('http://api.openweathermap.org/data/2.5/weather?appid=77763ccd48ec0f13fc6b857738eaa50c&q='+input())
dataget=dataget.json()

wea={}
try:
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
