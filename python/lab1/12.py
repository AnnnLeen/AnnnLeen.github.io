# 12. Отсортировать строки в порядке увеличения квадратичного отклонения среднего веса ASCII-кода символа строки от среднего веса ASCII-кода символа первой строки.

import math

def weight(s):
    sum = 0
    for char in s:
        sum += ord(char)
    return sum / len(s)

strings = input("Введите список строк (через точку): ").split(". ")
first_weight = weight(strings[0])
string_deviations = [(s, math.sqrt((weight(s) - first_weight) ** 2)) for s in strings]
sorted_strings = sorted(string_deviations, key=lambda x: x[1])

for s, _ in sorted_strings:
    print(s)
