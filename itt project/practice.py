import sqlite3

conn=sqlite3.connect("database.db")
c=conn.cursor()
#c.execute("drop table student")

c.execute("create table student(name text,m1 integer,m2 integer,m3 integer)")


c.execute("insert into student values('Ausaf',99,98,97)")
c.execute("insert into student values('Swapnil',77,87,90)")
c.execute("insert into student values('Srijan',99,10,97)")
c.execute("insert into student values('Atyab',80,80,80)")
c.execute("insert into student values('Arahs',99,98,97)")
c.execute("alter table student add column total integer")

c.execute("select * from student")
result=c.fetchall()
for i in result:
    sum=i[1]+i[2]+i[3]
    print(sum)
    c.execute("update student set total =? where name =?",(sum,i[0]))
    conn.commit()

c.execute("select * from student")
print(c.fetchall())








conn.commit()
conn.close()
