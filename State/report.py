import firebase_admin
from firebase_admin import credentials
from firebase_admin import firestore

credentials = credentials.Certificate('path/to/serviceAccount.json')
firebase_admin.initialize_app(credentials)

db = firestore.client()

users_ref = db.collection('users')
docs = users_ref.get()

for doc in docs:
    print('{} => {}'.format(doc.id, doc.to_dict()))