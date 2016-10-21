using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_07_03
{
    class Program
    {
        static void Main(string[] args)
        {
            Cat Cica = new Cat();
            Fish Halacska = new Fish();

            Cica.AttackSpeed = 10;
            Halacska.FleeSpeed = 9;

            Cica.Attack(Halacska);
            Console.WriteLine();

            Console.ReadKey();
        }
    }

    class Cat : IPredator
    {
        public int AttackSpeed { get; set; }
        public void Attack(IPrey prey)
        {
            if (prey.FleeSpeed > this.AttackSpeed)
            {
                prey.Flee();
            } else
            {
                Console.WriteLine($"{this.GetType().Name} kills {prey.GetType().Name}");
            }
        }
    }

    class Fish : IPrey
    {
        public int FleeSpeed { get; set; }
        public void Flee()
        {
            Console.WriteLine($"{this.GetType().Name} escapes");
        }
    }


    interface IPredator
    {
        int AttackSpeed { get; set; }
        void Attack(IPrey prey);
    }

    interface IPrey
    {
        int FleeSpeed { get; set; }
        void Flee();
    }
}
