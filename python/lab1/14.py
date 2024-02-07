# В-2 14. Отсортировать строки в порядке квадратичного отклонения дисперсии максимального среднего веса ASCII-кода тройки символов в строке от максимального среднего веса ASCII-кода тройки символов в первой строке.

import math
from itertools import combinations

def average_ascii_weight(triple):
    sum = 0
    for char in triple:
        sum += ord(char)
    return sum / len(triple)

strings = input("Введите список строк (через точку): ").split(". ")
triples = [list(combinations(s, 3)) for s in strings]
max_averages = [max([average_ascii_weight(triple) for triple in t]) for t in triples]
variances = [sum((i - sum(max_averages) / len(max_averages)) ** 2 for i in max_averages) / len(max_averages) for _ in max_averages]
first_variance = variances[0]
deviations = [abs(v - first_variance) for v in variances]
string_deviations = list(zip(strings, deviations))
sorted_strings = sorted(string_deviations, key=lambda x: x[1])

for s, _ in sorted_strings:
    print(s)
