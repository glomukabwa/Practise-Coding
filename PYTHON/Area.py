def area():
    print("Choose the shape whose area you want calculated;")
    print("1.Circle")
    print("2.Rectangle")
    choice = input("Enter Choice:")
    if choice == "1":
        radius = int(input("Enter radius: "))
        pi = 3.14
        circleArea = pi * (radius * radius)
        print("The area of the circle is:", circleArea)
    elif choice == "2":
        length = int(input("Enter Height:"))
        width = int(input("Enter Width:"))
        rectangleArea = length * width
        print("The area of the rectangle is:", rectangleArea)
    else:
        print("Invalid choice, please try again")

area()