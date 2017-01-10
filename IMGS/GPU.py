# -*- coding: utf-8 -*-
"""
Created on Sat Sep 10 17:20:32 2016

@author: Stas
"""

import Tkinter as Tk
from Tkinter import *
def printer(event):
     print ("Как всегда очередной 'Hello World!'")


root = Tk()
but = Button(root)
but["text"] = "Печать"
but.bind("<Button-1>",printer)
but.pack()
lst1 = ['Option1','Option2','Option3']
var1 = StringVar()
drop = OptionMenu(root,var1,*lst1)
drop.pack()
root.mainloop()

 ### OR!!! ###
class But_print:
     def __init__(self):
          self.but = Button(root)
          self.but["text"] = "Печать"
          self.but.bind("<Button-1>",self.printer)
          self.but.pack()
     def printer(self,event):
          print ("Как всегда очередной 'Hello World!'")
 
root = Tk()
obj = But_print()
root.mainloop()

# NEW
root = Tk()
 
fra1 = Frame(root,width=500,height=100,bg="darkred")
fra2 = Frame(root,width=300,height=200,bg="green",bd=20)
fra3 = Frame(root,width=500,height=150,bg="darkblue")
 
fra1.pack()
fra2.pack()
fra3.pack()
 
root.mainloop() 

# Промотка
root = Tk()
 
tx = Text(root,width=40,height=3,font='14')
scr = Scrollbar(root,command=tx.yview)
tx.configure(yscrollcommand=scr.set)
 
tx.grid(row=0,column=0)
scr.grid(row=0,column=1)
root.mainloop() 

# АКТИВАЦИЯ
def output(event):
     s = ent.get()
     if s == "1":
          tex.delete(1.0,END)
          tex.insert(END,"Обслуживание клиентов на втором этаже")
     elif s == "2":
          tex.delete(1.0,END)
          tex.insert(END,"Пластиковые карты выдают в соседнем здании")
     else:
          tex.delete(1.0,END)
          tex.insert(END,"Введите 1 или 2 в поле слева")
 
root = Tk()
 
ent = Entry(root,width=1)
but = Button(root,text="Вывести")
tex = Text(root,width=20,height=3,font="12",wrap=WORD)
 
ent.grid(row=0,column=0,padx=20)
but.grid(row=0,column=1)
tex.grid(row=0,column=2,padx=20,pady=10)
 
but.bind("<Button-1>",output)
 
root.mainloop() 

# PICTURE
windowMain = Tk()
windowMain.geometry('600x600+50+50')
im ='C:/Users/Stas/Documents/kaggle/IMGS/Action_1.gif'
ph_im =PhotoImage(file=im, master=windowMain, width=200, height=200)
label = Label(windowMain, image=ph_im, bd=2, relief=SUNKEN) 
label.pack()
windowMain.mainloop()


import tkFont
from PIL import Image
windowMain = Tk()
im_temp = Image.open('C:/Users/Stas/Documents/kaggle/IMGS/Action_1.jpg')
im_temp = im_temp.resize((250, 250), Image.ANTIALIAS)
im_temp.save('C:/Users/Stas/Documents/kaggle/IMGS/Action_1.ppm', "ppm") 
im_temp1 = Image.open('C:/Users/Stas/Documents/kaggle/IMGS/Action_5.jpg')
im_temp1 = im_temp1.resize((250, 250), Image.ANTIALIAS)
im_temp1.save('C:/Users/Stas/Documents/kaggle/IMGS/Action_5.ppm', "ppm")
windowMain.geometry('600x600+50+50')
im ='C:/Users/Stas/Documents/kaggle/IMGS/Action_1.ppm'
im1 ='C:/Users/Stas/Documents/kaggle/IMGS/Action_5.ppm'
ph_im =PhotoImage(file=im, master=windowMain)
ph_im1 =PhotoImage(file=im1, master=windowMain)
label = Label(windowMain, image=ph_im, bd=2, relief=SUNKEN) 
label.grid(row=0,column=1,columnspan=3)
#label.place(x=40,y=0)
label1 = Label(windowMain, text='Thirty Seconds to Mars - Stay', bd=3)
#label1.place(x=80, y=260)
label1.grid(row=1,column=2,columnspan=1)
label2 = Label(windowMain, image=ph_im1, relief=SUNKEN) 
#label2.place(x=310,y=0)
label2.grid(row=0,column=5,columnspan=3)
label3 = Label(windowMain, text='Angels & Airwaves - The Dream Walker', bd=3)
#label3.place(x=325, y=260)
label3.grid(row=1,column=6,columnspan=1)
windowMain.grid_columnconfigure(4, weight=1)
windowMain.grid_columnconfigure(0, weight=2)
windowMain.grid_columnconfigure(8, weight=2)
windowMain.grid_rowconfigure(0, weight=1)
windowMain.grid_rowconfigure(2, weight=8)
but = Button(windowMain)
but["text"] = "Like it!"
but.place(x=70, y=330)
but1 = Button(windowMain)
but1["text"] = "Dislike it!"
but1.place(x=136, y=330)
but2 = Button(windowMain)
but2["text"] = "Skip it!"
but2.place(x=215, y=330)
label4 = Label(windowMain, text='Please rate these two random songs or skip them!')
label4.place(x=170, y=420)
windowMain.mainloop()

