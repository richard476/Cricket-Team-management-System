n1 = int(input())
l1 = list(map(int,input().split()))

n2 = int(input())
l2 = list(map(int,input().split()))

l = []
i=j=0

while i<n1 and j<n2:
    if (l1[i]<l2[j]):
        l.append(l1[i])
        i += 1
    else:
        l.append(l2[j])
        j += 1
if(i<n1):
    l.extend(l1[i:])
if(j<n2):
    l.extend(l2[j:])
print(l)

