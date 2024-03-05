# 2. В-2. Записать в файл N натуральных чисел: a1, a2, a3, ..., an.
# Числа получить с помощью генератора случайных чисел. Сформировать
# новый файл, элементами которого являются числа:
# a1, a1*a2, a1*a2*a3, ..., a1*a2*...*an.

import random

N = 5
random_numbers = [random.randint(1, 10) for i in range(N)]

with open('input.txt', 'w') as file:
    file.write(str(N) + '\n')
    file.write(' '.join(map(str, random_numbers)))

with open('input.txt', 'r') as file:
    N = int(file.readline().strip())
    random_numbers = list(map(int, file.readline().split()))

result = 1
with open('output.txt', 'w') as file:
    for i in random_numbers:
        result *= i
        file.write(str(result) + '\n')
