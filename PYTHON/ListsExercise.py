#Create a list
print("Create a list:")
car_list = ['Fortuner', 'Defender', 'V8', 'Escalade', 'CX-5', 'Alphard', 'Dualis']
print(car_list)

#print the datatype of the list
print(" ")
print("Print the datatype of the list:")
print(type(car_list))

#print a few elements from various indexes
print(" ")
print("Print a few elements from various indexes:")
print(car_list[0])

#Using slicing give an output of the first to the 3rd element, give an output of the last 3 elements
#First 3:
print(" ")
print("Slicing, First 3:")
print(car_list[0:3])

#Last 3:
print(" ")
print("Slicing, Last 3:")
print(car_list[4:])

#Pop out an element from your list
print(" ")
print("Pop out an element from your list:")
car_list.pop()
print(car_list)

#Insert the poped out element at the index it was
print(" ")
print("Insert the poped out element at the index it was:")
car_list.insert(6, 'Dualis')
print(car_list)

#Create a second list and add it to the first list you created
print(" ")
print("Create a second list and add it to the first list you created:")
car_list2 = ['Verosa', 'Evoque']
car_list+=car_list2
print(car_list)