import socket
import threading
from difflib import SequenceMatcher

class Client:
    def __init__(self):
        self.stop = ["arret", "stop", "break", "end", "block", "fin"]
        self.host = input("Enter the destination address: ")
        self.port = 5566
        self.sockete = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

    def similar(self, a, b):
        return SequenceMatcher(None, a, b).ratio()

    def receive_messages(self):
        while True:
            message = self.sockete.recv(1024).decode("utf8")
            print(message)

    def connexion(self):
        try:
            self.sockete.connect((self.host, self.port))
            print(f"Connected via port: {self.port}")

            print("Welcome on Chat Bot")

            # Créer un thread pour recevoir les messages
            receive_thread = threading.Thread(target=self.receive_messages)
            receive_thread.start()

            while True:
                message = input(">")

                # Vérifier si le message ressemble à plus de 50% à un mot de la liste stop
                similar_words = [word for word in self.stop if self.similar(message, word) >= 0.5]

                if not similar_words:
                    message = message.encode("utf8")
                    self.sockete.sendall(message)
                elif similar_words:
                    self.sockete.close()
                    break

            print('J\'espère vous avoir aidé!')
        except Exception as e:
            print(f"Error: {e}")
        finally:
            self.sockete.close()

client = Client()
client.connexion()
