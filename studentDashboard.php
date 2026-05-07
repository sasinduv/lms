<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:var(--font-sans);background:var(--color-background-tertiary);color:var(--color-text-primary)}
.shell{display:grid;grid-template-columns:220px 1fr;min-height:100vh}
.sidebar{background:var(--color-background-primary);border-right:0.5px solid var(--color-border-tertiary);padding:1.25rem 0;display:flex;flex-direction:column;gap:4px}
.logo{padding:0 1.25rem 1rem;font-size:16px;font-weight:500;border-bottom:0.5px solid var(--color-border-tertiary);margin-bottom:0.5rem}
.logo span{color:#185FA5}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 1.25rem;font-size:14px;color:var(--color-text-secondary);cursor:pointer;border-radius:0;transition:background 0.15s}
.nav-item:hover{background:var(--color-background-secondary)}
.nav-item.active{background:var(--color-background-info);color:var(--color-text-info);font-weight:500}
.nav-item i{font-size:17px}
.nav-label{font-size:11px;color:var(--color-text-tertiary);padding:8px 1.25rem 4px;text-transform:uppercase;letter-spacing:.05em}
.main{overflow-y:auto;padding:1.5rem}
.topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem}
.greeting h1{font-size:18px;font-weight:500}
.greeting p{font-size:13px;color:var(--color-text-secondary);margin-top:2px}
.topbar-right{display:flex;align-items:center;gap:10px}
.avatar{width:34px;height:34px;border-radius:50%;background:var(--color-background-info);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:500;color:var(--color-text-info)}
.btn-sm{display:flex;align-items:center;gap:6px;padding:6px 14px;font-size:13px;border:0.5px solid var(--color-border-secondary);border-radius:var(--border-radius-md);background:var(--color-background-primary);color:var(--color-text-primary);cursor:pointer}
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:1.5rem}
.stat-card{background:var(--color-background-secondary);border-radius:var(--border-radius-md);padding:1rem}
.stat-label{font-size:12px;color:var(--color-text-secondary);margin-bottom:6px;display:flex;align-items:center;gap:6px}
.stat-value{font-size:22px;font-weight:500}
.stat-sub{font-size:12px;color:var(--color-text-secondary);margin-top:3px}
.section-title{font-size:14px;font-weight:500;margin-bottom:0.75rem;display:flex;justify-content:space-between;align-items:center}
.section-title a{font-size:12px;color:var(--color-text-info);font-weight:400;cursor:pointer}
.two-col{display:grid;grid-template-columns:1fr 340px;gap:1.25rem}
.courses-grid{display:grid;gap:10px}
.course-card{background:var(--color-background-primary);border:0.5px solid var(--color-border-tertiary);border-radius:var(--border-radius-lg);padding:1rem 1.25rem;display:flex;gap:14px;align-items:flex-start}
.course-icon{width:40px;height:40px;border-radius:var(--border-radius-md);display:flex;align-items:center;justify-content:center;font-size:19px;flex-shrink:0}
.ic-blue{background:#E6F1FB;color:#185FA5}
.ic-teal{background:#E1F5EE;color:#0F6E56}
.ic-amber{background:#FAEEDA;color:#854F0B}
.ic-purple{background:#EEEDFE;color:#534AB7}
.ic-coral{background:#FAECE7;color:#993C1D}
.course-info{flex:1;min-width:0}
.course-name{font-size:14px;font-weight:500;margin-bottom:2px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.course-meta{font-size:12px;color:var(--color-text-secondary);margin-bottom:8px}
.progress-bar{height:4px;background:var(--color-border-tertiary);border-radius:2px;overflow:hidden}
.progress-fill{height:100%;border-radius:2px;transition:width 0.3s}
.pf-blue{background:#378ADD}
.pf-teal{background:#1D9E75}
.pf-amber{background:#EF9F27}
.pf-purple{background:#7F77DD}
.pf-coral{background:#D85A30}
.progress-row{display:flex;justify-content:space-between;align-items:center;margin-top:5px}
.progress-pct{font-size:11px;color:var(--color-text-secondary)}
.badge{font-size:11px;padding:2px 8px;border-radius:var(--border-radius-md);font-weight:500}
.badge-green{background:#EAF3DE;color:#3B6D11}
.badge-amber{background:#FAEEDA;color:#854F0B}
.badge-blue{background:#E6F1FB;color:#185FA5}
.right-col{display:flex;flex-direction:column;gap:1.25rem}
.card{background:var(--color-background-primary);border:0.5px solid var(--color-border-tertiary);border-radius:var(--border-radius-lg);padding:1rem 1.25rem}
.todo-item{display:flex;align-items:flex-start;gap:10px;padding:8px 0;border-bottom:0.5px solid var(--color-border-tertiary)}
.todo-item:last-child{border-bottom:none;padding-bottom:0}
.todo-check{width:16px;height:16px;border-radius:4px;border:0.5px solid var(--color-border-secondary);flex-shrink:0;margin-top:2px;display:flex;align-items:center;justify-content:center;cursor:pointer}
.todo-check.done{background:#E1F5EE;border-color:#1D9E75}
.todo-text{font-size:13px;flex:1}
.todo-text.done-text{text-decoration:line-through;color:var(--color-text-secondary)}
.todo-due{font-size:11px;color:var(--color-text-tertiary);margin-top:2px}
.sched-item{display:flex;gap:10px;padding:7px 0;border-bottom:0.5px solid var(--color-border-tertiary)}
.sched-item:last-child{border-bottom:none;padding-bottom:0}
.sched-time{font-size:11px;color:var(--color-text-secondary);min-width:52px;padding-top:2px}
.sched-info{flex:1}
.sched-name{font-size:13px;font-weight:500}
.sched-room{font-size:11px;color:var(--color-text-secondary);margin-top:1px}
.dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;margin-top:5px}
.dot-blue{background:#378ADD}
.dot-teal{background:#1D9E75}
.dot-amber{background:#EF9F27}
.dot-purple{background:#7F77DD}
.announce-item{padding:8px 0;border-bottom:0.5px solid var(--color-border-tertiary)}
.announce-item:last-child{border-bottom:none;padding-bottom:0}
.announce-title{font-size:13px;font-weight:500}
.announce-body{font-size:12px;color:var(--color-text-secondary);margin-top:2px;line-height:1.5}
.announce-time{font-size:11px;color:var(--color-text-tertiary);margin-top:3px}
</style>
    
<h2 class="sr-only">Student LMS Dashboard showing courses, assignments, schedule and announcements</h2>
<div class="shell">
  <nav class="sidebar">
    <div class="logo">📚 <span>EduLearn</span></div>
    <div class="nav-label">Main</div>
    <div class="nav-item active"><i class="ti ti-layout-dashboard" aria-hidden="true"></i> Dashboard</div>
    <div class="nav-item"><i class="ti ti-books" aria-hidden="true"></i> My Courses</div>
    <div class="nav-item"><i class="ti ti-calendar" aria-hidden="true"></i> Schedule</div>
    <div class="nav-item"><i class="ti ti-clipboard-list" aria-hidden="true"></i> Assignments</div>
    <div class="nav-item"><i class="ti ti-chart-bar" aria-hidden="true"></i> Grades</div>
    <div class="nav-label">Resources</div>
    <div class="nav-item"><i class="ti ti-file-text" aria-hidden="true"></i> Study Materials</div>
    <div class="nav-item"><i class="ti ti-message-circle" aria-hidden="true"></i> Discussions</div>
    <div class="nav-item"><i class="ti ti-bell" aria-hidden="true"></i> Notifications</div>
    <div style="flex:1"></div>
    <div class="nav-item"><i class="ti ti-settings" aria-hidden="true"></i> Settings</div>
    <div class="nav-item"><i class="ti ti-logout" aria-hidden="true"></i> Sign out</div>
  </nav>
  <main class="main">
    <div class="topbar">
      <div class="greeting">
        <h1>Good morning, Amal 👋</h1>
        <p>Wednesday, 7 May 2026 — Semester 2, Week 11</p>
      </div>
      <div class="topbar-right">
        <button class="btn-sm"><i class="ti ti-search" aria-hidden="true" style="font-size:15px"></i> Search</button>
        <button class="btn-sm"><i class="ti ti-bell" aria-hidden="true" style="font-size:15px"></i></button>
        <div class="avatar">AM</div>
      </div>
    </div>
    <div class="stats">
      <div class="stat-card">
        <div class="stat-label"><i class="ti ti-books" style="font-size:15px" aria-hidden="true"></i> Enrolled</div>
        <div class="stat-value">5</div>
        <div class="stat-sub">Active courses</div>
      </div>
      <div class="stat-card">
        <div class="stat-label"><i class="ti ti-clipboard-check" style="font-size:15px" aria-hidden="true"></i> Assignments</div>
        <div class="stat-value">3</div>
        <div class="stat-sub">Due this week</div>
      </div>
      <div class="stat-card">
        <div class="stat-label"><i class="ti ti-chart-line" style="font-size:15px" aria-hidden="true"></i> Avg grade</div>
        <div class="stat-value">84%</div>
        <div class="stat-sub">Across all courses</div>
      </div>
      <div class="stat-card">
        <div class="stat-label"><i class="ti ti-clock" style="font-size:15px" aria-hidden="true"></i> Study hours</div>
        <div class="stat-value">12h</div>
        <div class="stat-sub">This week</div>
      </div>
    </div>
    <div class="two-col">
      <div>
        <div class="section-title">My courses <a>View all →</a></div>
        <div class="courses-grid">
          <div class="course-card">
            <div class="course-icon ic-blue"><i class="ti ti-code" aria-hidden="true"></i></div>
            <div class="course-info">
              <div class="course-name">Introduction to Computer Science</div>
              <div class="course-meta">Dr. Silva · 24 lessons</div>
              <div class="progress-bar"><div class="progress-fill pf-blue" style="width:72%"></div></div>
              <div class="progress-row"><span class="progress-pct">72% complete</span><span class="badge badge-blue">In progress</span></div>
            </div>
          </div>
          <div class="course-card">
            <div class="course-icon ic-teal"><i class="ti ti-math-function" aria-hidden="true"></i></div>
            <div class="course-info">
              <div class="course-name">Calculus II</div>
              <div class="course-meta">Prof. Perera · 30 lessons</div>
              <div class="progress-bar"><div class="progress-fill pf-teal" style="width:55%"></div></div>
              <div class="progress-row"><span class="progress-pct">55% complete</span><span class="badge badge-amber">Quiz due</span></div>
            </div>
          </div>
          <div class="course-card">
            <div class="course-icon ic-amber"><i class="ti ti-atom" aria-hidden="true"></i></div>
            <div class="course-info">
              <div class="course-name">Physics for Engineers</div>
              <div class="course-meta">Dr. Fernando · 28 lessons</div>
              <div class="progress-bar"><div class="progress-fill pf-amber" style="width:88%"></div></div>
              <div class="progress-row"><span class="progress-pct">88% complete</span><span class="badge badge-green">Almost done</span></div>
            </div>
          </div>
          <div class="course-card">
            <div class="course-icon ic-purple"><i class="ti ti-letter-a" aria-hidden="true"></i></div>
            <div class="course-info">
              <div class="course-name">Academic English</div>
              <div class="course-meta">Ms. Jayawardena · 20 lessons</div>
              <div class="progress-bar"><div class="progress-fill pf-purple" style="width:40%"></div></div>
              <div class="progress-row"><span class="progress-pct">40% complete</span><span class="badge badge-blue">In progress</span></div>
            </div>
          </div>
          <div class="course-card">
            <div class="course-icon ic-coral"><i class="ti ti-world" aria-hidden="true"></i></div>
            <div class="course-info">
              <div class="course-name">Digital Society & Ethics</div>
              <div class="course-meta">Prof. Wijesekara · 18 lessons</div>
              <div class="progress-bar"><div class="progress-fill pf-coral" style="width:25%"></div></div>
              <div class="progress-row"><span class="progress-pct">25% complete</span><span class="badge badge-amber">Essay due</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="right-col">
        <div class="card">
          <div class="section-title">To-do <a>Add task</a></div>
          <div class="todo-item">
            <div class="todo-check done"><i class="ti ti-check" style="font-size:11px;color:#1D9E75" aria-hidden="true"></i></div>
            <div><div class="todo-text done-text">Read Chapter 7 — Recursion</div><div class="todo-due">Completed</div></div>
          </div>
          <div class="todo-item">
            <div class="todo-check"></div>
            <div><div class="todo-text">Submit Calculus Problem Set 4</div><div class="todo-due">Due tomorrow</div></div>
          </div>
          <div class="todo-item">
            <div class="todo-check"></div>
            <div><div class="todo-text">Ethics essay — first draft</div><div class="todo-due">Due Fri 9 May</div></div>
          </div>
          <div class="todo-item">
            <div class="todo-check"></div>
            <div><div class="todo-text">Physics lab report upload</div><div class="todo-due">Due Sat 10 May</div></div>
          </div>
          <div class="todo-item">
            <div class="todo-check"></div>
            <div><div class="todo-text">Prepare English presentation slides</div><div class="todo-due">Due Mon 12 May</div></div>
          </div>
        </div>
        <div class="card">
          <div class="section-title">Today's schedule</div>
          <div class="sched-item"><div class="dot dot-blue"></div><div class="sched-time">8:00 AM</div><div class="sched-info"><div class="sched-name">Computer Science</div><div class="sched-room">Room B-204 · Lecture</div></div></div>
          <div class="sched-item"><div class="dot dot-teal"></div><div class="sched-time">10:30 AM</div><div class="sched-info"><div class="sched-name">Calculus II</div><div class="sched-room">Room A-101 · Tutorial</div></div></div>
          <div class="sched-item"><div class="dot dot-amber"></div><div class="sched-time">1:00 PM</div><div class="sched-info"><div class="sched-name">Physics Lab</div><div class="sched-room">Lab 3 · Practical</div></div></div>
          <div class="sched-item"><div class="dot dot-purple"></div><div class="sched-time">3:30 PM</div><div class="sched-info"><div class="sched-name">Academic English</div><div class="sched-room">Online · Zoom</div></div></div>
        </div>
        <div class="card">
          <div class="section-title">Announcements</div>
          <div class="announce-item"><div class="announce-title">Mid-semester exams schedule released</div><div class="announce-body">Exams run 19–23 May. Check the portal for your individual timetable.</div><div class="announce-time">2 hours ago</div></div>
          <div class="announce-item"><div class="announce-title">Library extended hours this week</div><div class="announce-body">Open until 10 PM Mon–Fri during the exam prep period.</div><div class="announce-time">Yesterday</div></div>
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>