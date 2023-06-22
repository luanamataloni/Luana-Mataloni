import time
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

import INCLUIDOR
import os

PATH = "SRC"

class Watcher:
    DIRECTORY_TO_WATCH = "./" + PATH
    DIRECTORY_TO_WATCH2 = "./fn"
    DIRECTORY_TO_WATCH3 = "./plantillas"

    def __init__(self):
        self.observer = Observer()
        self.observer2 = Observer()
        self.observer3 = Observer()

    def run(self):
        event_handler = Handler()
        self.observer.schedule(event_handler, self.DIRECTORY_TO_WATCH, recursive=True)
        self.observer.start()

        self.observer2.schedule(event_handler, self.DIRECTORY_TO_WATCH2, recursive=True)
        self.observer2.start()

        self.observer3.schedule(event_handler, self.DIRECTORY_TO_WATCH3, recursive=True)
        self.observer3.start()
        try:
            while True:
                time.sleep(5)
        except:
            self.observer.stop()
            self.observer2.stop()
            self.observer3.stop()
            print ("Error")

        self.observer.join()


class Handler(FileSystemEventHandler):

    @staticmethod
    def on_any_event(event):
        if event.is_directory:
            return None
            
        elif event.event_type == 'created':
            print ("Received created event - %s." % event.src_path)
            INCLUIDOR.main()

        elif event.event_type == 'modified':
            INCLUIDOR.main()




if __name__ == '__main__':

    pwd = os.getcwd()
    print("|---------- ESCUCHANDO CAMBIOS EN (" + str(pwd) + ") ----------|")
    
    w = Watcher()
    w.run()

