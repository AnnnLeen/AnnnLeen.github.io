# 10. Дан список строк с клавиатуры. Упорядочить по количеству слов в строке.

def count_words(s):
    words = s.split(" ")
    return len(words)

strings = input("Введите список строк (через точку): ").split(". ")
strings = sorted(strings, key=count_words)

for i in strings:
    print(i)
