def BankingApp():
    currentAmount = 0
    while True: #This keeps the app running until someone exists. I did this for the withdrawal part after 
                #depositing cz current amount kept on resetting to zero
        print("What service would you like? Pick an option:")
        print("A.Deposit Money")
        print("B.Withdraw Money")
        print("C.Exit")
        choice = input("Enter the option: ")
    
        if choice == "A":
            dAmount = int(input("Enter amount you want to deposit: "))
            currentAmount = currentAmount + dAmount
            print("Successful deposit!")
            print("Your current balance is: ", currentAmount)
        elif choice == "B":
            wAmount = int(input("Enter amount you want to withdraw: "))
            if currentAmount < wAmount:
                print("Your balance is less than your withdrawal amount. Please enter a smaller amount")
            else:
                currentAmount = currentAmount - wAmount
                print("Withdrawal was successful!")
                print("Your current balance is: ", currentAmount)
        elif choice == "C":
            print("Byeee!!!")
            break
        else:
            print("Invalid choice. Please try again")

BankingApp()