using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0704
{
    class Program
    {
        // Main
        static void Main(string[] args)
        {
            // Create a cat
            Cat myCat = new Cat(500, 400);
            Cat myCat2 = new Cat(500, 100);
            Cat myCat3 = new Cat(500, 600);

            myCat.Attack(myCat2);
            myCat.Attack(myCat3);

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
