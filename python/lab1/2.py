# В-2 2. Дана строка, состоящая из символов латиницы. Проверить, упорядочены ли строчные символы этой строки по возрастанию.

def is_sorted(s):
    massiv_chars = [ch for ch in s if ch.islower()]
    sorted_chars = sorted(massiv_chars)
    return massiv_chars == sorted_chars

stroka = input("Введите строку, состоящую из символов латиницы: ")
result = is_sorted(stroka)
print(result)
