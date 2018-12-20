import pickle
import sys
import mysql.connector
import pandas as pd
from operator import itemgetter

# Parse user_id from book portal
user_id = sys.argv[1]
user_id = int(user_id)


# Save model
loaded_model = pickle.load(open('C:/Users/syfqh/PycharmProjects/testSimple/finalized_model.sav', 'rb'))


# Connecting to mysql
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="v2_lib_sys"
)


# Reading ratings file
data_from_db = pd.read_sql('SELECT book_id FROM book_rating', con=mydb)
book_id_list = data_from_db.book_id.unique().tolist()


recommend = []

for book_id in book_id_list:
    result = loaded_model.predict(user_id, book_id)
    recommend.append((book_id, result.est))


data = sorted(recommend, reverse=True, key=itemgetter(1))[:10]
top10_book = [x[0] for x in data]

'''
mycursor = mydb.cursor()

top10_book_url = []

for data in top10_book:
    mycursor.execute('SELECT book_id FROM book_items WHERE book_id='+str(data))
    myresult = mycursor.fetchall()
    for data in myresult:
        top10_book_url.append(data[0])'''

ids = ''

for data in top10_book:
    ids = ids + str(data) + ' '

print(ids)

