# darknode-api

DarkNode API is a Webhook API that you can run on your website created by the DarkNode team.

# Example POST Request
When a POST Request is made to the API it will post the information in the "Body" to your [Firebase Realtime Database](https://firebase.google.com/docs/database)
```
import requests
import uuid

url = "Your API URL"

# "id" is required by the API
Body = {
    "text": "Hello",
    "id": uuid.uuid1().hex, 
}

headers = {
        "Content-Type":"application/x-www-form-urlencoded",
        "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:102.0) Gecko/20100101 Firefox/102.0"
}

r = requests.post(url=url, data=Body, headers=headers)

print(r.text, r.status_code, r.content, r.json)
```
