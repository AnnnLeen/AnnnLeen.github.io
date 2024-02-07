# 11. Отсортировать строки в порядке среднего веса ASCII-кода символа строки.

def weight(s):
    sum = 0
    for char in s:
        sum += ord(char)
    return sum / len(s)

strings = input("Введите список строк (через точку): ").split(". ")
strings = [(s, weight(s)) for s in strings]
strings = sorted(strings, key = lambda x: x[1])

for s, _ in strings:
    print(s)
