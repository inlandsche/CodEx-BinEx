from flask import Flask, jsonify, render_template
from os_command import *

app = Flask(__name__)
app.static_folder = 'static'

@app.route('/')
def index():
    return "<h1>Hello</h1>"

@app.route('/file/<filename>')
def read(filename):
    res = read_file(f"{filename}")
    
    if(res == ""):
        result = {"success": "false", "message": f"file {filename} not found"}
        return jsonify(result), 400
    
    if(filename.lower() == "flag.txt"):
        result = {"success": "false", "message": "You don't have access to the file."}
        return jsonify(result), 403
    
    result = {"success": "true", "message": "found", "content": f"{res}"}
    return jsonify(result), 200

if __name__ == '__main__':
    app.run(debug=True)
