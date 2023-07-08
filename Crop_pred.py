
#importing the required libraries
import sys
import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split

#Reading the csv file
data=pd.read_csv('cpdata.csv')
#print(data.head(1))
#Creating dummy variable for target i.e label
label= pd.get_dummies(data.label).iloc[: , 1:]
data= pd.concat([data,label],axis=1)
data.drop('label', axis=1,inplace=True)
#print('The data present in one row of the dataset is')
#print(data.head(1))
train=data.iloc[:, 0:4].values
test=data.iloc[: ,4:].values

#Dividing the data into training and test set
X_train,X_test,y_train,y_test=train_test_split(train,test,test_size=0.3)

from sklearn.preprocessing import StandardScaler
sc = StandardScaler()
X_train = sc.fit_transform(X_train)
X_test = sc.transform(X_test)

#Importing Decision Tree classifier
from sklearn.tree import DecisionTreeRegressor
clf=DecisionTreeRegressor()

#Fitting the classifier into training set
clf.fit(X_train,y_train)
pred=clf.predict(X_test)

from sklearn.metrics import accuracy_score
# Finding the accuracy of the model
a=accuracy_score(y_test,pred)
#print("The accuracy of this model is: ", a*100)
# data for prediction


temp=float(sys.argv[1])
humidity=float(sys.argv[2])
pH=float(sys.argv[3])
rain=float(sys.argv[4])

l=[]
l.append(temp)
l.append(humidity)
l.append(pH)
l.append(rain)
predictcrop=[l]

# Putting the names of crop in a single list
crops=['Black gram', 'Chickpea', 'Coconut', 'Coffee', 'Cotton', 'Ground Nut',
       'Jute', 'Kidney Beans', 'Lentil', 'Moth Beans', 'Mung Bean', 'Peas',
       'Pigeon Peas', 'Rubber', 'Sugarcane', 'Tea', 'Tobacco', 'apple',
       'banana', 'grapes', 'maize', 'mango', 'millet', 'muskmelon', 'orange',
       'papaya', 'pomegranate', 'rice', 'watermelon', 'wheat']

#Predicting the crop
c=[]
numarr = np.array(predictcrop)
trans = sc.transform(numarr)
predictions = clf.predict(trans)
#print("Predictions-->",predictions)
count=0
for i in range(0,29):
    if(predictions[0][i]==1):
        c.append(crops[i])
        count=count+1
    i=i+1
if(count==0):
    print('No crop is suitable')
else:
    print('The predicted crop is ')
    for element in c:
       print(element)