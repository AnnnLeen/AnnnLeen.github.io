# В-2 7. Дана строка. Необходимо найти количество задействованных символов латиницы в этой строке (без дубликатов)

import re

def find_letters(s):
    pattern = r"[a-z]"
    letters = re.findall(pattern, s)
    letters = set(letters)
    return len(letters)

stroka = input("Введите строку: ")
result = find_letters(stroka)
print(result)
