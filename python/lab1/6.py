# В-2 6. Дана строка. Необходимо найти все строчные символы латиницы, которые в ней используются.

import re

def find_letters(s):
    pattern = r"[a-z]"
    letters = re.findall(pattern, s)
    letters = list(set(letters))
    return letters

stroka = input("Введите строку: ")
result = find_letters(stroka)
print(result)
