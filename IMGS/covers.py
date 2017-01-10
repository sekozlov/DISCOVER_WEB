# -*- coding: utf-8 -*-
"""
Created on Sat Sep 03 23:51:21 2016

@author: Stas
"""
from bs4 import BeautifulSoup
import requests
import re
import urllib2
import os
import json

def get_soup(url,header):
  return BeautifulSoup(urllib2.urlopen(urllib2.Request(url,headers=header)))

image_type = "Action"
# you can change the query for the image  here  
query = "30 Seconds to Mars - Stay cover"
query= query.split()
query='+'.join(query)
url="https://www.google.com/search?hl=ru&site=imghp&tbm=isch&source=hp&biw=1366&bih=667&q="+query

print url
header = {'User-Agent': 'Mozilla/5.0'} 
soup = get_soup(url,header)

images = [a['src'] for a in soup.find_all("img", {"src": re.compile("gstatic.com")})]
#print images


f = open('00000001.jpg','wb')
f.write(requests.get(images[0]).content)
f.close()



########

def get_soup(url,header):
    return BeautifulSoup(urllib2.urlopen(urllib2.Request(url,headers=header)),'html.parser')


query = raw_input("30 Seconds to Mars - Stay cover")# you can change the query for the image  here
image_type="ActiOn"
query= query.split()
query='+'.join(query)
url="https://www.google.co.in/search?q="+query+"&source=lnms&tbm=isch"
print url
#add the directory for your image here
DIR="Pictures"
header={'User-Agent':"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.134 Safari/537.36"
}
soup = get_soup(url,header)



DIR = 'C:\\Users\\Stas\\Documents\\kaggle\\IMGS'
query = "Angels & Airwaves - The Dream Walker Demos" + ' cover'
query= query.split()
query='+'.join(query)
query= query.replace('&','%26')

url="https://www.google.com/search?hl=ru&site=imghp&tbm=isch&source=hp&biw=1366&bih=667&q="+query
header={'User-Agent':"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.134 Safari/537.36"
}
soup = get_soup(url,header)
ActualImages=[]
for a in soup.find_all("div",{"class":"rg_meta"}):
    link , Type =json.loads(a.text)["ou"]  ,json.loads(a.text)["ity"]
    ActualImages.append((link,Type))
ActualImages = list(ActualImages[0])

print  "there are total" , len(ActualImages),"images"



if not os.path.exists(DIR):
            os.mkdir(DIR)
DIR = os.path.join(DIR, query.split()[0])

if not os.path.exists(DIR):
            os.mkdir(DIR)
###print images

    try:
        req = urllib2.Request(ActualImages[0], headers={'User-Agent' : header})
        raw_img = urllib2.urlopen(req).read()

        cntr = len([i for i in os.listdir(DIR) if image_type in i]) + 1
        print cntr
        if len(Type)==0:
            f = open(os.path.join(DIR , image_type + "_"+ str(cntr)+".jpg"), 'wb')
        else :
            f = open(os.path.join(DIR , image_type + "_"+ str(cntr)+"."+ActualImages[1]), 'wb')


        f.write(raw_img)
        f.close()
    except Exception as e:
        print "could not load : "+ActualImages[0]
        print e