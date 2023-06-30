# darknode-api

DarkNode API is a Webhook API that you can run on your website created by the DarkNode team.

# Example POST Request in Python
When a POST Request is made to the API, it will post the information in the "Body" to your [Firebase Realtime Database](https://firebase.google.com/docs/database)
```
import requests
import uuid

url = "https://YourApiUrl.com/api.php"

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

# Additional Info
You can get free web hosting from [000webhost](https://www.000webhost.com/)

Our implementation of this takes the data from our Firebase Realtime Database and displays it on our web panel; I might update this repo later to contain some demo code showing how to do that yourself.
