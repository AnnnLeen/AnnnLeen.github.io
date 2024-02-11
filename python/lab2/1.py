# В-2 1. Даны два списка чисел. Посчитайте, сколько чисел содержится одновременно и в первом списке, и во втором.

def count_numbers(list1, list2):
    set1 = set(list1)
    set2 = set(list2)
    common_numbers = set1.intersection(set2)
    return len(common_numbers)


list1 = list(map(int, input("Введите элементы 1-го списка: ").split()))
list2 = list(map(int, input("Введите элементы 2-го списка: ").split()))
result = count_numbers(list1, list2)
print(result)
