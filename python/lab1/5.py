# 5. Дана строка. Необходимо найти все даты, которые описаны в виде "31 февраля 2007"

import re

def find_dates(stroka):
    pattern = r"\b(\d{1,2} [январяфевралмартаапрелямаиянявиялгустасентябряоктябряоябрядекабря]+ \d{4})\b"
    dates = re.findall(pattern, stroka)
    return dates

stroka = input("Введите строку на русском: ")
result = find_dates(stroka)
print(result)
