import pandas as pd
import mysql.connector
from surprise import Reader, Dataset, SVD, evaluate
import pickle


# Connecting to mysql
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="v2_lib_sys"
)

# Reading ratings file
data_from_db = pd.read_sql('SELECT user_id, book_id, rating FROM book_rating', con=mydb)


user_id = data_from_db.user_id.tolist()
book_id = data_from_db.book_id.tolist()
rating = data_from_db.rating.tolist()


print(len(user_id), len(book_id), len(rating))


rating_dics = {'book_id': book_id,
               'user_id': user_id,
               'rating': rating}

df = pd.DataFrame(rating_dics)

print(df)
print(type(df))


# Load Reader library
reader = Reader(rating_scale=(1, 5))

# Load ratings with Dataset library
data = Dataset.load_from_df(df[['user_id', 'book_id', 'rating']], reader)

# Split the dataset for 5-fold evaluation
data.split(n_folds=5)

# Use the SVD algorithm.
svd = SVD()
trainset = data.build_full_trainset()
svd.fit(trainset)

"""
# use SVD to predict the rating that user_id will give to a random book (let's say with book ID 9643).
print(svd.predict(user_id, 9643))
"""

# Compute the RMSE of the SVD algorithm.
evaluate(svd, data, measures=['RMSE', 'MAE'])


#save model
filename = 'finalized_model.sav'
pickle.dump(svd, open(filename, 'wb'))