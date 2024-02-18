import socket
import threading

great = ["bonjour", "hello", "salut", "yo", "hey", "morning"]
condition = ["comment", "ca vas", "ca dit quoi", "how are you"]
question = []

players = []
number_player = 0

class Server:
    def __init__(self, host, port):
        self.host = host
        self.port = port
        self.server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        self.server_socket.bind((self.host, self.port))
        self.server_socket.listen(5)
        print("Serveur démarré")

    def connexion(self):
        while True:
            connection, address = self.server_socket.accept()
            my_thread = ThreadListClient(connection, address)
            my_thread.start()

class ThreadListClient(threading.Thread):
    def __init__(self, connection, address):
        threading.Thread.__init__(self)
        self.connection = connection
        self.address = address

    def run(self):
        players.append(self.connection)
        print(f"Connexion depuis : {self.address[0]} depuis le port {self.address[1]}")

        while True:
            talk = self.connection.recv(1024).decode("utf8")
            talk = talk.lower()

            if not talk:
                print(f"Le joueur {self.address[0]} s'est déconnecté")
                players.remove(self.connection)
                break
            elif talk in great:
                self.connection.sendall("Bonjour, je suis Jess. Que puis-je faire pour vous?".encode("utf8"))
            elif talk in condition:
                self.connection.sendall("Je vais bien et vous?".encode("utf8"))
            else:
                question.append(talk)
                self.connection.sendall("Desoler je ne suis pas apte a repondre a cette question :(".encode("utf8"))

            for player in players:
                if player != self.connection:  # Ne pas renvoyer le message à l'émetteur
                    player.sendall(f"{self.address[0]}: {talk}".encode("utf8"))


host, port = ("", 5566)
server = Server(host, port)
server.connexion()
