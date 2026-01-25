def Password_check():
    password = input("Please enter password: ")
    
    hasEightPlus = False
    hasUppercase = False
    hasLowerCase = False
    hasNumber = False
    hasSpecialCharacters = False
    specialCharacters = "!@#$%^&*()_+-"

    if len(password) >= 8:
        hasEightPlus = True
    for x in password:
        if x.isupper():
            hasUppercase = True
        elif x.islower():
            hasLowerCase = True
        elif x.isdigit():
            hasNumber = True
        elif x in specialCharacters:
            hasSpecialCharacters = True
    
    if hasEightPlus and hasUppercase and hasLowerCase and hasNumber and hasSpecialCharacters:
        print("STRONG PASSWORD!!")
    if hasEightPlus == False:
        print("Password must have 8 or more characters")
    if hasUppercase == False:
        print("Password must have 1 or more uppercase characters")
    if hasLowerCase == False:
        print("Password must have 1 or more lowercase characters")
    if hasNumber == False:
        print("Password must have 1 or more numbers")
    if hasSpecialCharacters == False:
        print("Password must have 1 or more special characters")

Password_check()