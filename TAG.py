from machine import Pin, PWM
import network
import urequests
import utime
import ujson

wlan = network.WLAN(network.STA_IF)
wlan.active(True)

ssid = 'IPhone de KGB (2)'
password = 'aaronkgb'
wlan.connect(ssid, password)

url = "http://172.20.10.12/whisp_project/GetOne.php"

colors_tweet = {
    "red": (255, 0, 0),
    "green": (0, 255, 0),
    "blue": (0, 0, 255),
}

led1 = PWM(Pin(18, mode=Pin.OUT))
led2 = PWM(Pin(17, mode=Pin.OUT))
led3 = PWM(Pin(16, mode=Pin.OUT))

tabled = [led1, led2, led3]

for led in tabled:
    led.freq(1000)
    led.duty_u16(0)

def color(r, g, b):
    tabled[0].duty_u16(r * 255)
    tabled[1].duty_u16(g * 255)
    tabled[2].duty_u16(b * 255)

while not wlan.isconnected():
    print("pas co")
    utime.sleep(1)

while True:
    try:
        print("GET")
        r = urequests.get(url)
        p_type = r.json()["tag"]
        print(p_type)
        print(colors_tweet[p_type])
        color(colors_tweet[p_type][0], colors_tweet[p_type][1], colors_tweet[p_type][2])
        r.close()
        utime.sleep(1)
    except Exception as e:
        print(e)