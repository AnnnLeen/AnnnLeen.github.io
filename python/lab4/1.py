# 1. В-2. Менеджер по работе с персоналом присваивает рейтинговый файл каждому из N кандидатов, резюме которых он изучает.
# Он хочет нанять двух специалистов с суммарным рейтингом не менее K баллов. Требуется по имеющимся данным о баллах N кандидатов определить,
# сколько различных пар кандидатов можно выбрать так, чтобы их суммарный рейтинговый балл составлял не менее K. Две пары кандидатов считаются
# различными, если хотя бы один из членов пары не присутствует в другой паре. Запишите в ответе найденное число пар.

def count_pairs(arr, K):
    arr.sort()
    left = 0
    right = len(arr) - 1
    count = 0
    while left < right:
        if arr[left] + arr[right] >= K:
            count += right - left
            right -= 1
        else:
            left += 1
    return count


with open('27-169a.txt', 'r') as file:
    N_A, K_A = map(int, file.readline().split())
    ratings_A = [int(line.strip()) for line in file]

with open('27-169b.txt', 'r') as file:
    N_B, K_B = map(int, file.readline().split())
    ratings_B = [int(line.strip()) for line in file]

resultA = count_pairs(ratings_A, K_A)
resultB = count_pairs(ratings_B, K_B)

print("Для файла А:", resultA)
print("Для файла B:", resultB)

