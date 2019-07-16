// AddTwoNumbers.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"
#include <stdio.h>
#include <iostream>

using namespace std;

template<class T>
int length(T& arr)
{
    //cout << sizeof(arr[0]) << endl;
    //cout << sizeof(arr) << endl;
    return sizeof(arr) / sizeof(arr[0]);
}

struct ListNode {
    int val;
    ListNode *next;
    ListNode(int x) : val(x), next(NULL) {}

    static ListNode* GetList(int arr[], int length){
        ListNode *list = new ListNode(0);
        ListNode *head = list;

        for (int i = 0; i < length-1; i++)
        {
            head->val = arr[i];
            head->next = new ListNode(0);
            head = head->next;
        }

        head->val = arr[length - 1];

        return list;
    }

    static void PrintNode(ListNode *n){

        while (n)
        {
            cout << n->val;
            if (n = n->next){
                cout << "->";
            }

        }
        cout << endl;
    }
};

class Solution {
public:
    static ListNode* addTwoNumbers(ListNode* l1, ListNode* l2) {
        if (l1 == NULL) return l2;
        if (l2 == NULL) return l1;

        //         ListNode* i1 = l1;
        //         ListNode* i2 = l2;
        ListNode * rst = l1;

        while (l1 != NULL && l2 != NULL){

            int num = l2->val + l1->val;
            l1->val = num % 10;

            if (l1->next == NULL){
                if (l2->next != NULL){
                    l1->next = l2->next;
                    l1 = l1->next;
                    l1->val += num / 10;
                }
                else if (num / 10 == 1){
                    l1->next = new ListNode(1);
                }

                break;;

            }
            else if (l2->next == NULL){
                l1 = l1->next;
                l1->val += num / 10;

                break;
            }
            else{
                l1 = l1->next;
                l2 = l2->next;

                l1->val += num / 10;
            }

        }

        while (l1 != NULL && l1->val >= 10){
            l1->val %= 10;

            if (l1->next != NULL){
                l1 = l1->next;
                l1->val += 1;
            }
            else{
                l1->next = new ListNode(1);
                break;
            }
        }

        return rst;
    }

};


int _tmain(int argc, _TCHAR* argv[])
{
    ListNode* l1, *l2;
    int a[] = { 2, 5};
    int b[] = { 5, 1, 6 };

    //cout << length(a) << endl;

    l1 = ListNode::GetList(a, length(a));
    l2 = ListNode::GetList(b, length(b));

    ListNode::PrintNode(l1);
    ListNode::PrintNode(l2);

    ListNode * rst = Solution::addTwoNumbers(l1, l2);
    
    ListNode::PrintNode(rst);
   
    char c;
	cin >> c;
}

