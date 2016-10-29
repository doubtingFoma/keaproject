using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0703
{
    class Program
    {
        // Main
        static void Main(string[] args)
        {
            // Create a cat
            Cat myCat = new Cat(500);

            // Create a quick fish, attack it
            Fish myFish = new Fish(501);
            myCat.Attack(myFish);

            // Create a slow fish, attack it
            Fish myFish2 = new Fish(499);
            myCat.Attack(myFish2);
        }
    }

    // Interfaces
    interface IPrey
    {
        int FleeSpeed { get; set; }
        void Flee();
    }

    interface IPredator
    {
        int AttackSpeed { get; set; }
        void Attack(IPrey prey);
    }
}
