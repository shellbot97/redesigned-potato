
class SinglyLinkedListNode:
    def __init__(self, node_data):
        self.data = node_data
        self.next = None

class SinglyLinkedList:
    def __init__(self):
        self.head = None

def print_singly_linked_list(node, sep):
    while node:
        print(node)
        node = node.next

        if node:
            print(sep)


def insertNodeAtTail(head, data):
    if head is None: 
        head = SinglyLinkedListNode(data)
    else:
        insertNodeAtTail(head.next, data)
    return head



llist_elements = [141,302,164,530,474]

llist = SinglyLinkedList()

for i in llist_elements:
    llist_head = insertNodeAtTail(llist.head, i)
    llist.head = llist_head

print_singly_linked_list(llist.head, '\n')
