#include<iostream>
using namespace std;

int main() {
    int a, b, c, d;
    cin >> a >> b >> c >> d;

    // Multiplying by 100 to get percentage
    cout << "Accuracy Assessment " << ((a + d) * 100) / (a + b + c + d) << endl;
    cout << "Precision " << (a * 100) / (a + b) << endl;
    cout << "Recall " << (a * 100) / (a + c) << endl;
    cout << "Specificity " << (d * 100) / (d + b) << endl;
    cout << "Missclassification " <<(b + c) << endl;

    return 0;
}
