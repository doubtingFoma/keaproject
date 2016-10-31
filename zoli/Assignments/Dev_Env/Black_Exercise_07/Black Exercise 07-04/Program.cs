using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_07_04
{
    class Program
    {
        static void Main(string[] args)
        {
            Fish Halacska = new Fish();
            Halacska.FleeSpeed = 9;

            Cat Cica = new Cat();
            Cica.AttackSpeed = 10;
            Cica.FleeSpeed = 12;

            Cat NagyCica = new Cat();
            NagyCica.AttackSpeed = 11;
            NagyCica.FleeSpeed = 5;

            NagyCica.Attack(Cica);
            Cica.Attack(NagyCica);

            Console.ReadKey();
        }
    }

    class Cat : IPredator, IPrey
    {        
        public int AttackSpeed { get; set; }
        public void Attack(IPrey prey)
        {
            if (prey.FleeSpeed > this.AttackSpeed)
            {
                prey.Flee();
            }
            else
            {
                Console.WriteLine($"{this.GetType().Name} kills {prey.GetType().Name}");
            }
        }

        public int FleeSpeed { get; set; }
        public void Flee()
        {
            Console.WriteLine($"{this.GetType().Name} escapes");
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
