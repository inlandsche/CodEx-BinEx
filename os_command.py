import os

def read_file(filename):
    os.system("cat {} > output-file".format(filename))
    
    with open('output-file', 'r') as f:
        out = f.read()

    os.system("rm output-file")

    return out

def read_dir():
    os.system("ls > output-dir")

    with open('output-dir', 'r') as f:
        out = f.read()

    os.system("rm output-dir")

    return out