from flask import Flask
from flask import request
import os
app = Flask(__name__)

@app.route('/')
def hello_world():
    return 'Hello, World!'

@app.route('/call', methods=['POST'])
def call():
	if request.method== 'POST':
		message = request.form['message']
		phone = request.form['phone']
		cmdm = "asterisk -rx 'dialplan set global message "+message+"'"
		print (cmdm)
		os.system(cmdm)
		cmdm2 = "asterisk -rx 'originate SIP/"+phone+" extension 150@callfestival'"
		print (cmdm2)
		os.system(cmdm2)
		return "Success"
