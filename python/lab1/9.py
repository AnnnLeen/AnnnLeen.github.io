# 9. Прочитать список строк с клавиатуры. Упорядочить по длине строки.

strings = input("Введите список строк (через точку): ").split(". ")

strings = sorted(strings, key=len)

for i in strings:
    print(i)
