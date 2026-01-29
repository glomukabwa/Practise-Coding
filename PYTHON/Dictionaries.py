# Project Features:
# Store products and stock levels in a list of dictionaries.
# Allow the user to "sell" or "restock" items.
# Use functions for processing orders and updating stock.
# Use conditionals to warn if stock is low or out.
# Use arithmetic and logical operators to adjust inventory.
# Use while loop to keep app running until user exits.
inventory =[{'name':'milk', 'stock':15},{'name':'Sugar', 'stock':25},{'name':'tissue', 'stock':17}]

def sell():
    ItemName = input("Enter item to sell: ")
    quantity = int(input("Enter quantity: "))
    message = ""
    warningMessage = ""
    reorderLevel = 5
    for item in inventory:
        x = item['name']
        y = item['stock']
        if x == ItemName:
            if y < quantity:
                message = "Not enough stock for the purchase"
            else:
                y-=quantity
                message = f'Successful purchase of {x}. Remaining quantity in stock is {y}'
                if y < reorderLevel:
                    warningMessage=f'WARNING: Item {x} is less than {reorderLevel}. Please Restock'

    print(message) 
    print(warningMessage)    

def restock():
    ItemName = input("Enter item to restock: ")
    quantity = int(input("Enter quantity being added: "))
    message = ""
    for item in inventory:
        x = item['name']
        y = item['stock']
        if x == ItemName:
            y+= quantity
            message= f"New {x} quantity is {y}"
        elif x != ItemName:
            message= f'Item {ItemName} is not in stock'
        
    print(message) 

while True:
    print(" ")
    print("Please pick an option:")
    print("A.Sell")
    print("B.Restock")
    print("C.Exit")
    choice = input("Enter the option: ")
    if choice == "A":
        sell()
    elif choice == "B":
        restock()
    elif choice == "C":
        break
    else:
        print("Invalid choice")