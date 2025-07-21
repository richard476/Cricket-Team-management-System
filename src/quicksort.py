def quicksort(arr):
    if len(arr):
        return arr
    pivot = arr[len(arr)//2]
    left = [i for i in arr if i<pivot]
    middle = [i for i in arr if i == pivot]
    right = [i for i in arr if i>pivot]
    return quicksort(left)+middle + quicksort(right)
a=list(map(int,input().split()))
print(quicksort(a))

