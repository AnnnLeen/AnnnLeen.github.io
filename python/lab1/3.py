# В-2 3. Дана строка. Необходимо посчитать количество букв "А" в этой строке.

def is_A(s):
    k=0
    for char in s:
        if char == 'A':
            k += 1
    return k

stroka = input("Введите строку: ")
result = is_A(stroka)
print(result)
