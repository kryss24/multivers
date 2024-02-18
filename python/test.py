#coding:utf-8
great = ["bonjour","hello","salut","yo","hey","morning"]
stop = ["arret","stop","break","end","block","fin"]
condition = ["comment", "sa vas", "sa dit quoi", "how are you"]

start = True

while start:
    talk = input(">")
    talk = talk.lower()
    
    if talk in great:
        print("Bonjour, je suis jess. Que puis-je faire pour vous?")
    elif talk in stop:
        start = False
    elif talk in condition:
        print("Je vais bien et vous?")
    else:
        print("Desole en tant que IA je ne peux pas repondre a cette question !")

input("Jespere avoir repondue a vos attente ☺")